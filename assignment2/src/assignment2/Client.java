package assignment2;

import assignment2.bintree.base.BinTree;
import assignment2.bintree.other.BalancedBinTree;
import assignment2.bintree.other.FullBinTree;
import assignment2.bintree.other.PerfectBinTree;

public class Client {

	public static void main(String[] args) {
		Client c = new Client();
		
		// Test BinTree (Binary Tree)
		if (c.testBinaryTree()) {
			System.out.println("BinTree Passed.");
		}
		
		// Test BalancedBinTree (Balanced Binary Tree)
		if (c.testBalancedBinaryTree()) {
			System.out.println("BalancedBinTree Passed.");
		}
		
		// Test FullBinTree (Full Binary Tree)
		if (c.testFullBinaryTree()) {
			System.out.println("FullBinTree Passed.");
		}
		
		// Test PerfectBinTree (Perfect Binary Tree)
		if (c.testPerfectBinaryTree()) {
			System.out.println("PerfectBinTree Passed.");
		}
	}
	
	private boolean testBinaryTree() {
		BinTree[] bt = new BinTree[5];
		
		for (int i = 0; i < 5; ++i) {
			// Create 5 new instances, identified from 0..4
			bt[i] = new BinTree(i);
			
			// Contract 1: Ensure that the newly created instance does not have a height of zero.
			assert(bt[i].height() != 0);
			
			// Contract 3: Ensure newly created instance does not have a left or right node.
			assert(! bt[i].hasLeft());
			assert(! bt[i].hasRight());
		}
		
		// Contract 4: setLeft rejects null parameter.
		//bt[0].setLeft(null); // Should error out.
		bt[0].setLeft(bt[1]);
		
		// Contract 6: left is no longer null
		assert(bt[0].getLeft() != null);
		
		// Contract 7: left is the node we expect.
		assert(bt[0].getLeft() == bt[1]);
		
		// Contract 8: setRight rejects null parameter.
		//bt[0].setRight(null); // Should error out.
		bt[0].setRight(bt[2]);
		
		// Contract 10: right is no longer null
		assert(bt[0].getRight() != null);
		
		// Contract 11: right is the node we expect
		assert(bt[0].getRight() == bt[2]);
		
		// Contract 5: setLeft will not overwrite existing node.
		//bt[0].setLeft(bt[3]); // Should error out.
		
		// Contract 9: setRight will not overwrite existing node.
		//bt[0].setRight(bt[4]); // Should error out.
		
		return true;
	}
	
	private boolean testBalancedBinaryTree() {
		BalancedBinTree[] bt = new BalancedBinTree[6];
		
		for (int i = 0; i < 6; ++i) {
			bt[i] = new BalancedBinTree(i);
			assert bt[i].isBalanced();
		}
		
		/**
		 * Should inherit the invariant of the parent class. Thus,
		 * the height shouldn't be zero.
		 */
		for (BalancedBinTree t : bt) {
			assert t.height() > 0;
		}
		
		bt[0].setLeft(bt[1]);
		
		// Should still be balanced.
		assert bt[0].isBalanced();
		
		bt[0].setRight(bt[2]);
		
		// Should still be balanced.
		assert bt[0].isBalanced();
		
		bt[0].getLeft().setLeft(bt[3]);
		
		// Should still be balanced.
		assert bt[0].isBalanced();
		
		// Now we try to unbalance it by adding more to one side of the tree.
		//bt[0].getLeft().getLeft().setLeft(bt[4]); // Should error out.
		
		// The addition should not have been allowed, thus we should still be balanced.
		assert bt[0].isBalanced();
		
		return true;
	}
	
	private boolean testFullBinaryTree() {
		FullBinTree[] bt = new FullBinTree[5];
		
		for (int i = 0; i < 5; ++i) {
			bt[i] = new FullBinTree(i);
			assert bt[i].isTwoOrNoLeaf();
		}
		
		// Adding only 1 leaf should violate the invariant.
		//bt[0].setLeft(bt[1]); // Should error out.
		assert bt[0].isTwoOrNoLeaf();
		
		// Attempting to set one or both to null should violate contract 4 and 8.
		//bt[0].setLeftRight(null, bt[1]); // Should error out.
		//bt[0].setLeftRight(bt[1], null); // Should error out.
		//bt[0].setLeftRight(null, null); // Should error out.
		
		// Adding a pair of nodes should be fine.
		bt[0].setLeftRight(bt[1], bt[2]);
		assert bt[0].isTwoOrNoLeaf();
		
		// The two child nodes should now be what we expect them to be.
		assert bt[0].getLeft() == bt[1];
		assert bt[0].getRight() == bt[2];
		
		// Attempting to replace the pair of nodes should violate contracts 5 and 9.
		bt[0].setLeftRight(bt[3], bt[4]);
		
		// Make sure the previously set nodes haven't been overwritten.
		assert bt[0].getLeft() == bt[1];
		assert bt[0].getRight() == bt[2];
		
		// By this point, the method should still be true.
		assert bt[0].isTwoOrNoLeaf();
		
		// This should invalidate the invariant.
		//((FullBinTree) bt[0].getLeft()).setLeft(bt[3]); // Should error out.
		
		// Adding a pair should be fine.
		((FullBinTree) bt[0].getLeft()).setLeftRight(bt[3], bt[4]);
		assert bt[0].isTwoOrNoLeaf();
		assert bt[0].getLeft().getLeft() == bt[3];
		assert bt[0].getLeft().getRight() == bt[4];
		
		return true;
	}
	
	private boolean testPerfectBinaryTree() {
		PerfectBinTree[] bt = new PerfectBinTree[7];
		
		for (int i = 0; i < 7; ++i) {
			bt[i] = new PerfectBinTree(i);
			assert bt[i].sameHeight();
		}
		
		// Because we extend a full-bin. tree, we shouldn't be able to only
		// add a node on one side.
		//bt[0].setLeft(bt[1]); // Should error out.
		
		// Setting both the left and right should result in a perfect tree.
		bt[0].setLeftRight(bt[1], bt[2]);
		assert bt[0].sameHeight();
		
		// Setting the children on the left node should result in an imperfect tree.
		bt[0].getLeft().setLeftRight(bt[3], bt[4]);
		assert ! bt[0].sameHeight();
		
		// Setting the children on the right node should balance it out and create a perfect tree.
		bt[0].getRight().setLeftRight(bt[5], bt[6]);
		assert bt[0].sameHeight();
		
		return true;
	}

}
