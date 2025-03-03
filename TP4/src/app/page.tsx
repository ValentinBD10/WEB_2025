import { getPosts } from "@/actions/post.action";
import { ModeToggle } from "@/components/modetoggle";
import { Button } from "@/components/ui/button";
import { currentUser } from "@clerk/nextjs/server";
import { getDbUserId } from "@/actions/user.action";
import {
  SignInButton,
  SignedIn,
  SignedOut,
  UserButton,
} from '@clerk/nextjs';
import CreatePost from "@/components/createpost";
import WhoToFollow from "@/components/whotofollow";



export default async function Home() {
  const user = await currentUser();
  const posts = await getPosts();
  const dbUserId = await getDbUserId();

  return (
    <div className="grid grid-cols-1 lg:grid-cols-10 gap-6">
      <div className="lg:col-span-6">
        {user ? <CreatePost/> : null}
        </div>
        <div className="hidden lg:block lg:col-span-4 sticky top-20">
        <WhoToFollow/>
      </div>
    </div>
  );
}
